export function displayArray(array) {
    let newDiv = document.createElement('div');
    let table = document.createElement('table');
    let tbody = document.createElement('tbody');
  
    array.forEach(element => {
      let tr = document.createElement('tr');
      let name = document.createElement('td');
      let tva = document.createElement('td');
      let country = document.createElement('td');
      let type_id = document.createElement('td');
      let created = document.createElement('td');
  
      name.textContent = element.name;
      tva.textContent = element.tva;
      country.textContent = element.country;
      type_id.textContent = element.type_id;
      created.textContent = element.created_at;
  
      tr.appendChild(name);
      tr.appendChild(tva);
      tr.appendChild(country);
      tr.appendChild(type_id);
      tr.appendChild(created);
  
      tbody.appendChild(tr);
    });
  
    table.appendChild(tbody);
    newDiv.appendChild(table);
    newDiv.setAttribute('id', 'newDiv');
    
    return newDiv;
  }
  