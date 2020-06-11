import React from 'react';
import {
  BrowserRouter as Router,
  Route,
  Switch
} from 'react-router-dom';

// Styles
import './scss/app.scss';

// Pages
import About from './pages/About';
import Dashboard from './pages/Dashboard';
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
              <Route path="/about" component={About} />
              <Route path="/dashboard" component={Dashboard} />
            </Switch>
          </div>
        </main>
      </Router>
    </div>
  );
}

export default App;
