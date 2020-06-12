import React from 'react';
import {
  BrowserRouter as Router,
  Route,
  Switch
} from 'react-router-dom';

// Styles
import './scss/app.scss';

// Pages
import Buildings from './pages/Buildings';
import Expenses from './pages/Expenses';
import Home from './pages/Home';

// Layout
import SideBar from './layout/SideBar';
import Header from './layout/Header';

function App() {
  return (
    <div className="app">
      <Router>
        <SideBar />
        <main>
          <Header />
          <div className="content">
            <Switch>
              <Route exact path="/" component={Home} />
              <Route path="/obras" component={Buildings} />
              <Route path="/gastos" component={Expenses} />
            </Switch>
          </div>
        </main>
      </Router>
    </div>
  );
}

export default App;
