import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import { ReactComponent as SvgHome } from '../assets/images/icons/home.svg';
import { ReactComponent as SvgBricks } from '../assets/images/icons/bricks.svg';
import { ReactComponent as SvgCoin } from '../assets/images/icons/coin.svg';

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
        <span className="toggle" onClick={this.toggleMenu}>TOGGLE</span>
        <ul>
          <li>
            <Link to="/" props="inicio">
              <SvgHome />
              <span>INÍCIO</span>
            </Link>
          </li>
          <li>
            <Link to="/obras" props="obras">
              <SvgBricks />
              <span>OBRAS</span>
            </Link>
          </li>
          <li>
            <Link to="/gastos">
              <SvgCoin />
              <span>GASTOS</span>
            </Link>
          </li>
        </ul>
      </nav>
    );
  }
}

export default SideBar;