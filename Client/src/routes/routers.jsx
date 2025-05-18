import { createBrowserRouter } from 'react-router-dom';

import Home from '../pages/Home';
import { Root } from '../layouts/Root';

const router = createBrowserRouter([
  {
    path: '/',
    Component: Root,
    children: [
      { index: true, Component: Home },
    ],
  },

]);

export default router;
