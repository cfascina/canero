import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

// Styles
import './scss/app.scss';

// Layout
import SideBar from './layout/SideBar';
import Header from './layout/Header';

const App = ({ routes }) => (
  <Router>
    <SideBar items={routes} />
    <main>
      <Header items={routes} />
      <div className="content">
        <Switch>
          {routes.map((route, index) => (
            <Route
              key={index}
              path={route.path}
              component={route.component}
              exact={route.exact}
            />
          ))}
        </Switch>
      </div>
    </main>
  </Router>
);

export default App;
