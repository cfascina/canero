import React, { Component } from 'react';

class Header extends Component {
  constructor(props) {
    super(props);

    this.state = {
      pageTitle: 'INÍCIO'
    }
  }

  render() {
    return (
      <header>
        {this.state.pageTitle}
      </header>
    );
  }
}

export default Header;