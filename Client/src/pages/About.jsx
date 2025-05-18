import MissionVision from "../Shared/AboutSection/MissionVision";
import OurCompanySection from "../Shared/AboutSection/OurCompanySection";
import CommonHero from "../Shared/CommonHero";

const About = () => {
    return (
        <div>
            <CommonHero title="about us" />
            <OurCompanySection />
            <MissionVision />
        </div>
    );
};

export default About;