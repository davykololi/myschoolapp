import React from "react";
import {DatePicker} from '@gsebdev/react-simple-datepicker';

function ReactDateTwo({data}) {
    const onChangeCallback = ({target}) => {
        // a callback function when user select a date
    }
    <DatePicker
        id='datepicker-id'
        name='date-demo'
        onChange={onchangeCallback}
        value={'01/02/2023'}
    />  
}

export default ReactDateTwo;