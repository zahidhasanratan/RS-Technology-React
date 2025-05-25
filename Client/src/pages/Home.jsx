import { useLoaderData } from 'react-router-dom';
import Hero from '../Shared/Hero';
import AboutHome from '../Shared/AboutHome';
import ServiceHome from '../Shared/ServiceHome';
import HomeBrandsSection from './HomeBrandsSection';

const Home = () => {
  const { clients } = useLoaderData();

  return (
    <div>
      <Hero />
      <AboutHome />
      <ServiceHome title="SOLUTIONS" subtitle="Our Services and Solutions" />
      <HomeBrandsSection title="Our Brands" brands={clients} />
    </div>
  );
};

export default Home;
