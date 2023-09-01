import React, {useState} from 'react'

import { styles } from '../styles'

import {LoadingOutlined } from  '@ant-design/icons'

import Avatar from '../Avatar'

const EmailForm = props => {

    const [email, setEmail] = useState('')
    const [loading, setLoading] = useState(false)

    return(
        <div
        style = {{
            ...styles.emailFormWindow,
            ...{
                height: '100%',
                opacity: '1',
            }
        }}

        >
            <div style={{ height: '0px' }}>
                <div style={styles.stripe}/>

                </div>
           

        </div>
    )
}

export default EmailForm;