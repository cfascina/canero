import React, { Component } from "react";
import { NavLink } from "react-router-dom";

// Icons
import iconBrick from '../assets/images/icons/brick.png';
import iconCollapse from '../assets/images/icons/collapse.png';
import iconError from '../assets/images/icons/error.png';
import iconHome from '../assets/images/icons/home.png';
import iconMoney from '../assets/images/icons/money.png';

class SideBar extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isMenuCollapsed: true
    }

    this.toggleMenu = this.toggleMenu.bind(this);
    this.getIcon    = this.getIcon.bind(this);
  }
  
  toggleMenu() {
    this.setState({
      isMenuCollapsed: !this.state.isMenuCollapsed
    });    
  }

  getIcon(routeName) {
    switch(routeName) {
      case 'Início':  return iconHome;
      case 'Obras':   return iconBrick;
      case 'Gastos':  return iconMoney;
      default:        return iconError;
    }
  }

  render() {
    const navState = this.state.isMenuCollapsed ? 'collapsed' : 'expanded';

    return (
      <nav className={navState}>
        <div className="toggle" onClick={this.toggleMenu}>
          <img src={iconCollapse} alt="Recolher" />
          <span>Recolher</span>
        </div>
        {
          this.props.items.map((route, index) => (
            <NavLink key={index} to={route.path} exact={route.exact}>
              <img src={this.getIcon(route.name)} alt={route.name} />
              <span>{route.name}</span>
            </NavLink>
          ))
        }
      </nav>
    );
  }
}

export default SideBar;
