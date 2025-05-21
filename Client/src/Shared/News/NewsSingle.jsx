import { useLoaderData } from 'react-router-dom';
import CommonHero from '../CommonHero';

const NewsSingle = () => {
  const post = useLoaderData();

  return (
    <div>
      <CommonHero title="news" />
      <div className="mx-auto py-10 px-6 lg:px-24">
        <div className="relative group w-full h-80 overflow-hidden rounded-xl mb-6">
          <img
            src={post.image} // should be a full image URL from API
            alt={post.title}
            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
          />
          <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
        </div>

        <h1 className="text-sm text-indigo-950 font-normal mb-4">{post.date}</h1>
        <h1 className="text-3xl text-indigo-950 font-bold mb-4">{post.title}</h1>
      <div
  className="text-gray-700 text-lg leading-relaxed"
  dangerouslySetInnerHTML={{ __html: post.description }}
></div>


      </div>
    </div>
  );
};

export default NewsSingle;
