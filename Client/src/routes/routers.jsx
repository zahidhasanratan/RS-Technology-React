import { createBrowserRouter } from 'react-router-dom';

import Home from '../pages/Home';
import { Root } from '../layouts/Root';
import SingleSolution from '../Shared/SingleSolution';
import About from '../pages/About';
import Solutions from '../pages/Solutions';
import Clients from '../pages/Clients';
import ContactUs from '../pages/ContactUs';
import News from '../pages/News';
import Video from '../pages/Video';
import Photo from '../pages/Photo';
import Management from '../pages/Management';
import { NotFoundPage } from '../components/NotFoundPage';
import NewsSingle from '../Shared/News/NewsSingle';
import SingleAlbum from '../Shared/PhotoAlbum/SingleAlbum';
import AllProject from '../Shared/Projects/AllProject';
import Products from '../pages/Products';
import UpcommingProducts from '../pages/UpcommingProducts';
import ProjectDetails from '../Shared/Projects/ProjectDetails';
import RunningProducts from '../pages/RunningProject';
import { PageDetails } from '../pages/PageDetails';
import { Career } from '../pages/Career';
import { JobDetails } from '../Shared/CareerJob/JobDetails';
import { Apply } from '../Shared/CareerJob/Apply';
import { homeLoader } from '../components/homeLoader';
import AllBrandsPage from '../pages/AllBrandsPage';
import AllClientsPage from '../pages/AllClientsPage';

const router = createBrowserRouter([
  {
    path: '/',
    Component: Root,
    children: [
     { index: true, Component: Home, loader: homeLoader },

      {
        path: 'Service/:serviceSlug',
        loader: async ({ params }) => {
          const response = await fetch(`https://server.rst-bd.com/api/solution/${params.serviceSlug}`);
          if (!response.ok) {
            throw new Response('Service not found', { status: 404 });
          }
          return response.json();
        },
        Component: SingleSolution,
        errorElement: <div className="p-10 text-center text-red-500">Service not found (404)</div>,
      },

      { path: 'About', Component: About },
      { path: 'contact', Component: ContactUs },
      { path: 'upcomming-project', Component: UpcommingProducts },
      { path: 'completed-project', Component: Products },
      { path: 'running-project', Component: RunningProducts },
      { path: 'Solution', Component: Solutions },
      { path: 'brands', Component: AllBrandsPage },
      { path: 'clients', Component: AllClientsPage },

      {
        path: 'page/:slug',
        loader: async ({ params }) => {
          const response = await fetch(`https://server.rst-bd.com/api/page/${params.slug}`);
          if (!response.ok) {
            throw new Response('Page not found', { status: 404 });
          }
          return response.json();
        },
        Component: PageDetails,
        errorElement: <div className="p-10 text-center text-red-500">Page not found (404)</div>,
      },

   

      {
        path: 'video',
        loader: async () => {
          const res = await fetch('https://server.rst-bd.com/api/video');
          return res.json();
        },
        Component: Video,
      },

      {
        path: 'photo',
        loader: async () => {
          const res = await fetch('https://server.rst-bd.com/api/photo');
          return res.json();
        },
        Component: Photo,
      },

      {
        path: 'photo/:slug',
        loader: async ({ params }) => {
          const response = await fetch(`https://server.rst-bd.com/api/photo/${params.slug}`);
          if (!response.ok) {
            throw new Response('Photo album not found', { status: 404 });
          }
          return response.json();
        },
        Component: SingleAlbum,
        errorElement: <div className="p-10 text-center text-red-500">Photo album not found (404)</div>,
      },

      {
        path: 'news',
        loader: async () => {
          const res = await fetch('https://server.rst-bd.com/api/news');
          return res.json();
        },
        Component: News,
      },

      {
        path: 'news/:slug',
        loader: async ({ params }) => {
          const response = await fetch(`https://server.rst-bd.com/api/news/${params.slug}`);
          if (!response.ok) {
            throw new Response('News not found', { status: 404 });
          }
          return response.json();
        },
        Component: NewsSingle,
        errorElement: <div className="p-10 text-center text-red-500">News not found (404)</div>,
      },

      {
        path: 'projectdetails/:slug',
        Component: ProjectDetails,
      },

      {
        path: 'management',
        loader: async () => {
          const res = await fetch('https://server.rst-bd.com/api/Management');
          return res.json();
        },
        Component: Management,
      },

      {
        path: 'career',
        loader: async () => {
          const res = await fetch('https://server.rst-bd.com/api/career');
          return res.json();
        },
        Component: Career,
      },

      {
        path: 'careerDetails/:slugOrId',
        loader: async ({ params }) => {
          const res = await fetch(`https://server.rst-bd.com/api/careerDetails/${params.slugOrId}`);
          return res.json();
        },
        Component: JobDetails,
        errorElement: <div className="p-10 text-center text-red-500">Career details not found (404)</div>,
      },
{
  path: 'apply/:slugOrId',
  Component: Apply,
}
,

      {
        path: '*',
        Component: NotFoundPage,
      },
    ],
  },
]);

export default router;
