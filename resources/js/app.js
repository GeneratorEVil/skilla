import axios from 'axios';
import './bootstrap';

let token = document.getElementsByTagName('meta')[0].getAttribute('content');

const config = {
    headers: { Authorization: `Bearer ${token}` }
};

const getBetweenDates = (start, end, className = null) => {
    let url = className ? '/api/timetables/get-between-dates/' + start + '/' + end + '/' + className
        :
        '/api/timetables/get-between-dates/' + start + '/' + end;
    return axios.get(url, config).then(response => {
        return response.data;
    })
}

const getByClass = (className) => {
    return axios.get('/api/timetables/get-byclass/' + className, config).then(response => {
        return response.data;
    })
}

const getClasses = () => {
    return axios.get('/api/timetables/get-classes', config).then(response => {
        return response.data;
    })
}

const fillClases = async () => {
    let classes = await getClasses();
    console.log(classes);

    classes.data.forEach(element => {
        let option = document.createElement('option');
        option.value = element
        option.text = element;
        document.getElementById('className').appendChild(option);
    });

}

document.addEventListener("DOMContentLoaded", function (event) {
    fillClases();
});

let dateInputs = document.querySelectorAll('input[type=datetime-local]');

dateInputs.forEach(input => {
    input.addEventListener('change', (event) => {
        getData();
    });
})

document.getElementById('className').addEventListener('change', (event) => {
    getData();
})


const getData = async () => {
    let startDate = document.getElementById('startDate').value;
    let endDate = document.getElementById('endDate').value;
    let className = document.getElementById('className').value ?? null;
    let data;
    if (startDate && endDate) {
        data = await getBetweenDates(startDate, endDate, className);
    } else if (className && !startDate && !endDate) {
        data = await getByClass(className);
    }




    var tbody = document.querySelector("tbody");
    while(tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
   
    if (data) {
        data.data.forEach(element => {
            let row = tbody.insertRow();
            let classCell = row.insertCell(0);
            let dayCell = row.insertCell(1);
            let startCell = row.insertCell(2);
            let endCell = row.insertCell(3);
            let createdAt = row.insertCell(4);

            classCell.innerHTML = element.class;
            dayCell.innerHTML = element.day;
            startCell.innerHTML = element.start_time;
            endCell.innerHTML = element.end_time;
            createdAt.innerHTML = element.created_at;
            row.appendChild(classCell, dayCell, startCell, endCell, createdAt);
        })

    }


}


window.getBetweenDates = getBetweenDates;
window.getClasses = getClasses;
window.getByClass = getByClass;