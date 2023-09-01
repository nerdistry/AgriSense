import Reac from "react";

import { styles } from "../styles";

const SupportWindow = props => {
    return (
        <div
        style = {{
            ...styles.supportWindow,
            ...{opacity: props.visible ? '1' : '0'}
        }}
        >

       </div>
    )
}

export default SupportWindow;