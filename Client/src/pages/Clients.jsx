// src/pages/Clients.jsx
import { useLoaderData } from 'react-router-dom';
import CommonHero from "../Shared/CommonHero";
import BrandSection from "../Shared/BrandsSection";

const Clients = () => {
  const brands = useLoaderData();

  return (
    <div>
      <CommonHero title="Clients" />
      <div className="-my-12">
        <BrandSection title="" brands={brands} />
      </div>
    </div>
  );
};

export default Clients;
