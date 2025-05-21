import CommonHero from "../Shared/CommonHero";
import NewsSection from "../Shared/News/NewsSection";
import { useLoaderData } from 'react-router-dom';

const News = () => {
    const newsData = useLoaderData();  
    
    return (
        <div>
            <CommonHero title="news" />
            <NewsSection posts={newsData} /> 
        </div>
    );
};

export default News;
