import { useEffect, useState } from "react";
import AboutHome from "../Shared/AboutHome";
import BrandsSection from "../Shared/BrandsSection";
import Hero from "../Shared/Hero";
import ServiceHome from "../Shared/ServiceHome";
import HomeBrandsSection from "./HomeBrandsSection";

const Home = () => {
  const [clients, setClients] = useState([]);

  useEffect(() => {
    fetch("https://server.rst-bd.com/api/clients")
      .then((res) => res.json())
      .then((data) => setClients(data))
      .catch((err) => console.error("Failed to fetch clients:", err));
  }, []);

  return (
    <div>
      <Hero />
      <AboutHome />
      <ServiceHome title="SOLUTIONS" subtitle="Our Services and Solutions" />
      <HomeBrandsSection title="Our Clients" brands={clients} />
    </div>
  );
};

export default Home;
