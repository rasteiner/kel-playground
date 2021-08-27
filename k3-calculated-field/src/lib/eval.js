class Visitor {

  visit(node) {
    const func = `visit${node.node.slice(0, -4)}`

    if (func in this) {
      return this[func](node);
    }
  }

}

const symbols = {
  default: Symbol('default'),
}

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
      const left = this.visit(node.left)
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


export function evalNode(ast, context) {
  return new EvalVisitor(context).visit(ast);
}
