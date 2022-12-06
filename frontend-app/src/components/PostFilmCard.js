import { Link } from "react-router-dom";

const PostFilmCard = ({id, name, actors, genres}) => {
    return (
        <article className="mb-3">
            <h2 className="mb-1">{ name }</h2>
            <p className="mb-1 text-muted">
                {actors.map(actor => <span key={actor.id}>{actor.first_name} {actor.last_name} </span>)}
            </p>
            <p className="mb-1 text-muted">
                {genres.map(genre => <span key={genre.id}>{genre.name} </span>)}
            </p>
            <Link to={`/movies/${id}`}>Link</Link>
        </article>
    );
}

export default PostFilmCard;