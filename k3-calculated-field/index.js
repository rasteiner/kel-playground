(function () {
  'use strict';

  class Visitor {

    visit(node) {
      const func = `visit${node.node.slice(0, -4)}`;

      if (func in this) {
        return this[func](node);
      }
    }

  }

  const symbols = {
    default: Symbol('default'),
  };

  class EvalVisitor extends Visitor {
    constructor(context) {
      super();
      this.context = context;
    }

    visitVariable(node) {
      return this.context.get(node.id);
    }

    visitIdentifier(node) {
      return node.id;
    }

    visitMember(node) {
      console.log(node);
      return this.visit(node.left)[this.visit(node.right)];
    }

    visitAddition(node) {
      return this.visit(node.left) + this.visit(node.right);
    }

    visitSubtraction(node) {
      return this.visit(node.left) - this.visit(node.right);
    }

    visitMultiplication(node) {
      return this.visit(node.left) * this.visit(node.right);
    }

    visitDivision(node) {
      return this.visit(node.left) / this.visit(node.right);
    }

    visitExponentiation(node) {
      return Math.pow(this.visit(node.left), this.visit(node.right));
    }

    visitModulus(node) {
      return this.visit(node.left) % this.visit(node.right);
    }

    visitNumericLiteral(node) {
      return node.value;
    }

    visitBooleanLiteral(node) {
      return node.value;
    }

    visitStringLiteral(node) {
      return node.value;
    }

    visitNull(node) {
      return null;
    }

    visitNot(node) {
      return !this.visit(node.value);
    }

    visitCoalesce(node) {
      try {
        const left = this.visit(node.left);
        if(left === null || left === undefined || left === false) {
          throw new Error('left is falsy')
        } else {
          return left
        }
      } catch(e) {
        return this.visit(node.right);
      }
    }

    visitAnd(node) {
      return this.visit(node.left) && this.visit(node.right);
    }

    visitOr(node) {
      return this.visit(node.left) || this.visit(node.right);
    }

    visitComparative(node) {
      switch (node.op) {
        case '>':
          return this.visit(node.left) > this.visit(node.right);
        case '>=':
          return this.visit(node.left) >= this.visit(node.right);
        case '<':
          return this.visit(node.left) < this.visit(node.right);
        case '<=':
          return this.visit(node.left) <= this.visit(node.right);
      }
    }

    visitEquality(node) {
      switch (node.op) {
        case '==':
          return this.visit(node.left) === this.visit(node.right);
        case '!=':
          return this.visit(node.left) !== this.visit(node.right);
      }
    }

    visitTernary(node) {
      return this.visit(node.condition) ? this.visit(node.whentrue) : this.visit(node.whenfalse);
    }

    visitMatchEntry(node) {
      return {
        options: node.options.map(option => this.visit(option)),
        value: this.visit(node.value)
      };
    }

    visitDefault(node) {
      return symbols.default;
    }

    visitMatch(node) {
      const subject = this.visit(node.subject);
      const entries = node.entries.map(entry => this.visit(entry));

      for(const entry of entries) {
        for (const option of entry.options) {
          if(option === subject || option === symbols.default) {
            return entry.value;
          }
        }
      }

      return undefined;
    }

    visitObjectLiteral(node) {
      return Object.fromEntries(node.properties.map(property => [property.key, this.visit(property.value)]));
    }

    visitArrayLiteral(node) {
      return node.items.map(item => this.visit(item));
    }
  }


  function evalNode(ast, context) {
    return new EvalVisitor(context).visit(ast);
  }

  //

  var script = {
    props: {
      query: String,
      ast: Object,
    },

    watch: {
      result (newResult) {
        this.$emit('input', newResult);
      },
    },

    mounted() {
      this.$emit('input', this.result);

    },

    computed: {
      result() {
        console.log('evaluating...');
        return evalNode(this.ast, {
          get: (key) => {
            return this.$store.getters['content/values']()[key]
          }
        })
      }
    }
  };

  function normalizeComponent(template, style, script, scopeId, isFunctionalTemplate, moduleIdentifier /* server only */, shadowMode, createInjector, createInjectorSSR, createInjectorShadow) {
      if (typeof shadowMode !== 'boolean') {
          createInjectorSSR = createInjector;
          createInjector = shadowMode;
          shadowMode = false;
      }
      // Vue.extend constructor export interop.
      const options = typeof script === 'function' ? script.options : script;
      // render functions
      if (template && template.render) {
          options.render = template.render;
          options.staticRenderFns = template.staticRenderFns;
          options._compiled = true;
          // functional template
          if (isFunctionalTemplate) {
              options.functional = true;
          }
      }
      // scopedId
      if (scopeId) {
          options._scopeId = scopeId;
      }
      let hook;
      if (moduleIdentifier) {
          // server build
          hook = function (context) {
              // 2.3 injection
              context =
                  context || // cached call
                      (this.$vnode && this.$vnode.ssrContext) || // stateful
                      (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext); // functional
              // 2.2 with runInNewContext: true
              if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
                  context = __VUE_SSR_CONTEXT__;
              }
              // inject component styles
              if (style) {
                  style.call(this, createInjectorSSR(context));
              }
              // register component module identifier for async chunk inference
              if (context && context._registeredComponents) {
                  context._registeredComponents.add(moduleIdentifier);
              }
          };
          // used by ssr in case component is cached and beforeCreate
          // never gets called
          options._ssrRegister = hook;
      }
      else if (style) {
          hook = shadowMode
              ? function (context) {
                  style.call(this, createInjectorShadow(context, this.$root.$options.shadowRoot));
              }
              : function (context) {
                  style.call(this, createInjector(context));
              };
      }
      if (hook) {
          if (options.functional) {
              // register for functional component in vue file
              const originalRender = options.render;
              options.render = function renderWithStyleInjection(h, context) {
                  hook.call(context);
                  return originalRender(h, context);
              };
          }
          else {
              // inject component registration as beforeCreate hook
              const existing = options.beforeCreate;
              options.beforeCreate = existing ? [].concat(existing, hook) : [hook];
          }
      }
      return script;
  }

  const isOldIE = typeof navigator !== 'undefined' &&
      /msie [6-9]\\b/.test(navigator.userAgent.toLowerCase());
  function createInjector(context) {
      return (id, style) => addStyle(id, style);
  }
  let HEAD;
  const styles = {};
  function addStyle(id, css) {
      const group = isOldIE ? css.media || 'default' : id;
      const style = styles[group] || (styles[group] = { ids: new Set(), styles: [] });
      if (!style.ids.has(id)) {
          style.ids.add(id);
          let code = css.source;
          if (css.map) {
              // https://developer.chrome.com/devtools/docs/javascript-debugging
              // this makes source maps inside style tags work properly in Chrome
              code += '\n/*# sourceURL=' + css.map.sources[0] + ' */';
              // http://stackoverflow.com/a/26603875
              code +=
                  '\n/*# sourceMappingURL=data:application/json;base64,' +
                      btoa(unescape(encodeURIComponent(JSON.stringify(css.map)))) +
                      ' */';
          }
          if (!style.element) {
              style.element = document.createElement('style');
              style.element.type = 'text/css';
              if (css.media)
                  style.element.setAttribute('media', css.media);
              if (HEAD === undefined) {
                  HEAD = document.head || document.getElementsByTagName('head')[0];
              }
              HEAD.appendChild(style.element);
          }
          if ('styleSheet' in style.element) {
              style.styles.push(code);
              style.element.styleSheet.cssText = style.styles
                  .filter(Boolean)
                  .join('\n');
          }
          else {
              const index = style.ids.size - 1;
              const textNode = document.createTextNode(code);
              const nodes = style.element.childNodes;
              if (nodes[index])
                  style.element.removeChild(nodes[index]);
              if (nodes.length)
                  style.element.insertBefore(textNode, nodes[index]);
              else
                  style.element.appendChild(textNode);
          }
      }
  }

  /* script */
  const __vue_script__ = script;

  /* template */
  var __vue_render__ = function() {
    var _vm = this;
    var _h = _vm.$createElement;
    var _c = _vm._self._c || _h;
    return _c("div", { staticClass: "calculated-field" }, [
      _c("div", [
        _c("b", [_vm._v("Query:")]),
        _vm._v(" "),
        _c("pre", [_vm._v(_vm._s(_vm.query))])
      ]),
      _vm._v(" "),
      _c("hr", { staticStyle: { margin: "1rem 0" } }),
      _vm._v(" "),
      _c("div", [
        _c("b", [_vm._v("Result:")]),
        _vm._v(" "),
        _c("pre", [_vm._v(_vm._s(_vm.result))])
      ])
    ])
  };
  var __vue_staticRenderFns__ = [];
  __vue_render__._withStripped = true;

    /* style */
    const __vue_inject_styles__ = function (inject) {
      if (!inject) return
      inject("data-v-d7242ad8_0", { source: "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", map: {"version":3,"sources":[],"names":[],"mappings":"","file":"CalculatedField.vue"}, media: undefined });

    };
    /* scoped */
    const __vue_scope_id__ = undefined;
    /* module identifier */
    const __vue_module_identifier__ = undefined;
    /* functional template */
    const __vue_is_functional_template__ = false;
    /* style inject SSR */
    
    /* style inject shadow dom */
    

    
    const __vue_component__ = /*#__PURE__*/normalizeComponent(
      { render: __vue_render__, staticRenderFns: __vue_staticRenderFns__ },
      __vue_inject_styles__,
      __vue_script__,
      __vue_scope_id__,
      __vue_is_functional_template__,
      __vue_module_identifier__,
      false,
      createInjector,
      undefined,
      undefined
    );

  panel.plugin('rasteiner/k3-calculated-field', {
    fields: {
      'calculated': __vue_component__
    }
  });

}());
