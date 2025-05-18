// GallerySection.js
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import CommonHero from '../Shared/CommonHero';
import Album from '../Shared/PhotoAlbum/Album';

const Photo = () => {
    return (
        <div>
            <CommonHero title="photo gallery" />
            <Album />
        </div>
    );
};

export default Photo;
