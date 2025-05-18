import { useParams } from 'react-router-dom';
import post1 from '../../assets/rs-tech-asset/post-1.jpg';
import post2 from '../../assets/rs-tech-asset/post-2.jpg';
import post3 from '../../assets/rs-tech-asset/post-3.jpg';
import CommonHero from '../CommonHero';

const blogPosts = [
    {
        id: '1', title: 'News Title 1', date: '20 Jan', image: post1,
        content: `In today's fast-paced world, technology plays a central role in shaping our lives. From smartphones to cloud computing, we are constantly connected to the digital world, which offers a vast range of opportunities for personal and professional growth. The rapid evolution of technology has not only made communication more efficient but also transformed industries such as healthcare, education, and entertainment. Innovations in artificial intelligence, machine learning, and data analytics are pushing boundaries and creating new possibilities. As we continue to advance, it’s essential to embrace these changes while staying mindful of their potential impact on society and the environment.`
    },
    {
        id: '2', title: 'News Title 2', date: '21 Jan', image: post2,
        content: `In today's fast-paced world, technology plays a central role in shaping our lives. From smartphones to cloud computing, we are constantly connected to the digital world, which offers a vast range of opportunities for personal and professional growth. The rapid evolution of technology has not only made communication more efficient but also transformed industries such as healthcare, education, and entertainment. Innovations in artificial intelligence, machine learning, and data analytics are pushing boundaries and creating new possibilities. As we continue to advance, it’s essential to embrace these changes while staying mindful of their potential impact on society and the environment.`
    },
    {
        id: '3', title: 'News Title 3', date: '22 Jan', image: post3,
        content: `In today's fast-paced world, technology plays a central role in shaping our lives. From smartphones to cloud computing, we are constantly connected to the digital world, which offers a vast range of opportunities for personal and professional growth. The rapid evolution of technology has not only made communication more efficient but also transformed industries such as healthcare, education, and entertainment. Innovations in artificial intelligence, machine learning, and data analytics are pushing boundaries and creating new possibilities. As we continue to advance, it’s essential to embrace these changes while staying mindful of their potential impact on society and the environment.`
    },
];

const NewsSingle = () => {
    const { id } = useParams();
    const post = blogPosts.find(p => p.id === id);

    if (!post) return <div className="p-10 text-center text-red-500">News not found</div>;

    return (
        <div>
            <CommonHero title="news" />
            <div className="mx-auto py-10
             px-6 lg:px-24">
                <div className="relative group w-full h-80 overflow-hidden rounded-xl mb-6">
                    <img
                        src={post.image}
                        alt={post.title}
                        className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    />
                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                </div>

                <h1 className="text-sm text-indigo-950 font-normal mb-4">{post.date}</h1>
                <h1 className="text-3xl text-indigo-950 font-bold mb-4">{post.title}</h1>
                <p className="text-gray-700 text-lg leading-relaxed">{post.content}</p>
            </div>
        </div>
    );
};

export default NewsSingle;
