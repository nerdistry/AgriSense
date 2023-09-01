import Reac from "react";

import { styles } from "../styles";

import EmailForm from "./EmailForm";    

const SupportWindow = props => {
    return (
        <div
        className = 'transition-5'
        style = {{
            ...styles.supportWindow,
            ...{opacity: props.visible ? '1' : '0'}
        }}
        >

       </div>
    )
}

export default SupportWindow;