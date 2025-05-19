import { createBrowserRouter } from 'react-router-dom';

import Home from '../pages/Home';
import { Root } from '../layouts/Root';
import SingleSolution from '../Shared/SingleSolution';
import About from '../pages/About';

const router = createBrowserRouter([
  {
    path: '/',
    Component: Root,
    children: [
      { index: true, Component: Home },
      {
        path: 'Service/:serviceSlug',
        loader: async ({ params }) => {
          const response = await fetch(`http://127.0.0.1:8000/api/solution/${params.serviceSlug}`);
          if (!response.ok) {
            throw new Response('Service not found', { status: 404 });
          }
          const data = await response.json();
          return data;
        },
        Component: SingleSolution,
      },
      {
        path: 'About',
        Component: About
      },
      
    ],
  },
]);

export default router;
