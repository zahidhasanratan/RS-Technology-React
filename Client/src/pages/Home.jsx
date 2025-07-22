import { useLoaderData } from 'react-router-dom';
import Hero from '../Shared/Hero';
import AboutHome from '../Shared/AboutHome';
import ServiceHome from '../Shared/ServiceHome';
import HomeBrandsSection from './HomeBrandsSection';
import HomeClientSection from './HomeClientSection';
import { HomeStatistics } from './HomeStatistics';

const Home = () => {
  const { clients, clientsphoto } = useLoaderData();

  return (
    <div>
      <Hero />
      <AboutHome />
      <ServiceHome title="SOLUTIONS" subtitle="Our Services and Solutions" />
      <HomeBrandsSection title="Our Brands" brands={clients} />
      <HomeClientSection title="Our Clients" brands={clientsphoto} />
      <HomeStatistics />
    </div>
  );
};

export default Home;
