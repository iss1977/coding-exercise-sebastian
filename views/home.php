<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs.at challenge</title>
</head>
<body>
<h1>Stored jobs</h1>
<input type="text" id="search_text">
<button id="search">Search</button>
<div id="output">

</div>
<script>
    document.onload = readJobs();
    document.getElementById('search').addEventListener('click',readJobs);

    function readJobs(){
        let searchCriteria = document.getElementById('search_text').value.toLowerCase().trim();
        console.log(searchCriteria);


        fetch('http://localhost:8000/api')
            .then((res)=>res.json())
            .then(data => {

                let output = '<h2> JobS </h2>';
                data.forEach( function(dataRow){
                    let re = new RegExp(searchCriteria,'i');
                    searchValueFromRESTApi = dataRow.SearchString.toLowerCase().trim();
                    findpos = searchValueFromRESTApi.search(re);
                    if(findpos>=0)
                        output+=`
                        <ul>
                            <li>Job Title:${dataRow.title} </li>
                            <li>Company:${dataRow.company_name} </li>
                            <li>Location:${dataRow.location} </li>
                            <li>Date:${dataRow.date} </li>
                        </ul>
                    `;
                });
                document.getElementById('output').innerHTML=output;
            })
        ;
    }
</script>
</body>
</html>