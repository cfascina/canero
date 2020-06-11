import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class SideBar extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isMenuCollapsed: false
    }

    this.toggleMenu = this.toggleMenu.bind(this);
  }
  
  toggleMenu() {
    this.setState({
      isMenuCollapsed: !this.state.isMenuCollapsed
    });    
  }

  render() {
    const navState = this.state.isMenuCollapsed ? 'collapsed' : 'expanded';

    return (
      <nav className={navState}>
        <span onClick={this.toggleMenu}>TOGGLE</span>
        <ul>
          <li><Link to="/">Home</Link></li>
          <li><Link to="/">Home</Link></li>
          <li><Link to="/about">About</Link></li>
          <li><Link to="/dashboard">Dashboard</Link></li>
        </ul>
      </nav>
    );
  }
}

export default SideBar;