document.onload = readJobs();
document.getElementById('search').addEventListener('click',readJobs);

function readJobs(){
    let searchCriteria = document.getElementById('search_text').value.toLowerCase().trim();
    console.log(searchCriteria);
    
    let spinner = document.getElementById('spinner');
    spinner.style.display='inline-block';
    document.getElementById('output').innerHTML='';

    fetch('http://localhost:8000/api')
    .then((res)=>res.json())
    .then(data => {
        
        let output = '';
        data.forEach( function(dataRow){
            let re = new RegExp(searchCriteria,'i');
            searchValueFromRESTApi = dataRow.SearchString.toLowerCase().trim();
            findpos = searchValueFromRESTApi.search(re);
            if(findpos>=0)
            output+=`
            <div>
                <div class="card my-2 shadow p-0 mb-5 bg-white rounded" style="width: 100%;">
                <div class="card-header d-flex align-items-center">
                    <h6 class="my-0">${dataRow.title}</h6>
                    <p class="my-0">${dataRow.location}</p>
                </div>
                <div class="card card-body">
                    <h5 class="card-title">${dataRow.company_name}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${dataRow.date}</h6>
                    <hr/ class="my-1"> 
                    <p class="card-text mt-2">
                        ${dataRow.description}
                    </p>
                    <a href="#" class="card-link align-self-end mx-4">Zur job...</a>
                </div>
            </div>
            `;
        });
        document.getElementById('output').innerHTML=output;
        spinner.style.display='none';
    });
} // end of readjobs