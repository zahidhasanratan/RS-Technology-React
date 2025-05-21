import CommonHero from '../Shared/CommonHero';
import Album from '../Shared/PhotoAlbum/Album';
import { useLoaderData } from 'react-router-dom';

const Photo = () => {
    const albums = useLoaderData(); // <-- API data loaded here

    return (
        <div>
            <CommonHero title="Photo Gallery" />
            <Album albums={albums} />
        </div>
    );
};

export default Photo;
