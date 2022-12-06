const PostGenre = ({id, name, created_at}) => {
    return (
        <tr>
            <th scope="row">{ id }</th>
            <td>{ name }</td>
            <td>{ created_at }</td>
        </tr>
    );
}

export default PostGenre;