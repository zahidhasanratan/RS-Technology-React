import AboutHome from "../Shared/AboutHome";
import BrandsSection from "../Shared/BrandsSection";
import Hero from "../Shared/Hero"
import ServiceHome from "../Shared/ServiceHome";
const Home = () => {
    return (
        <div>
            <Hero />
            <AboutHome />
            <ServiceHome title="SERVICES" subtitle="Our Product and Services" />
            <BrandsSection title="Our Brands" />
        </div>
    );
};

export default Home;