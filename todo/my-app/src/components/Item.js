import React, {Component} from 'react';

class Item extends Component {
    constructor(props) {
        super(props);
        this.state={

        };

    }
    render() {
        
        const {item} = this.props;
        console.log( item );
        const index=this.props.index;
        
        
        return(
            <tr>
                <td className="text-center">{index+1}</td>
                <td>{item.name}</td>
                <td className="text-center">{item.level}<span className="label label-danger">High</span></td>
                <td>
                    <button type="button" className="btn btn-warning btn-sm">Edit</button>
                    <button type="button" className="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        )
    }
}

export default Item;