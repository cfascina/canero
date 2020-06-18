import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import { appRoutes } from './helpers/appRoutes';

ReactDOM.render(
  <React.StrictMode>
    <App routes={appRoutes} />
  </React.StrictMode>,
  document.getElementById('root')
);
