import { createBrowserRouter } from 'react-router-dom';

import Home from '../pages/Home';
import { Root } from '../layouts/Root';
import SingleSolution from '../Shared/SingleSolution';
import About from '../pages/About';
import Clients from '../pages/Clients';
import News from '../pages/News';
import Video from '../pages/Video';
import Management from '../pages/Management';
import { NotFoundPage } from '../components/NotFoundPage';
import NewsSingle from '../Shared/News/NewsSingle';


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
        Component: About,
      },
      {
        path: 'clients',
        loader: async () => {
          const res = await fetch('http://127.0.0.1:8000/api/clients');
          return res.json();
        },
        Component: Clients,
      },
      {
        path: 'video',
        loader: async () => {
          const res = await fetch('http://127.0.0.1:8000/api/video');
          return res.json();
        },
        Component: Video,
      },

      {
        path: 'news',
        loader: async () => {
          const res = await fetch('http://127.0.0.1:8000/api/news');
          return res.json();
        },
        Component: News,
      },
    {
    path: 'news/:slug',
    loader: async ({ params }) => {
      const response = await fetch(`http://127.0.0.1:8000/api/news/${params.slug}`);
      if (!response.ok) {
        throw new Response('News not found', { status: 404 });
      }
      return response.json();
    },
  Component: NewsSingle,
  errorElement: <div className="p-10 text-center text-red-500">News not found (404)</div>,
},
      {
        path: 'management',
        loader: async () => {
          const res = await fetch('http://127.0.0.1:8000/api/Management');
          return res.json();
        },
        Component: Management,
      },
      {
        path: '*',
        Component: NotFoundPage,
      },
    ],
  },
]);

export default router;
