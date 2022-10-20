var checkAll=document.getElementById("checkAll"),perPage=(checkAll&&(checkAll.onclick=function(){for(var e=document.querySelectorAll('.form-check-all input[type="checkbox"]'),t=0;t<e.length;t++)e[t].checked=this.checked,e[t].checked?e[t].closest("tr").classList.add("table-active"):e[t].closest("tr").classList.remove("table-active")}),8),options={valueNames:["id","name","owner","industry_type","star_value","location","employee","website","contact_email","since",{attr:"src",name:"image_src"}],page:perPage,pagination:!0,plugins:[ListPagination({left:2,right:2})]},companyList=new List("companyList",options).on("updated",function(e){0==e.matchingItems.length?document.getElementsByClassName("noresult")[0].style.display="block":document.getElementsByClassName("noresult")[0].style.display="none";var t=1==e.i,a=e.i>e.matchingItems.length-e.page;document.querySelector(".pagination-prev.disabled")&&document.querySelector(".pagination-prev.disabled").classList.remove("disabled"),document.querySelector(".pagination-next.disabled")&&document.querySelector(".pagination-next.disabled").classList.remove("disabled"),t&&document.querySelector(".pagination-prev").classList.add("disabled"),a&&document.querySelector(".pagination-next").classList.add("disabled"),e.matchingItems.length<=perPage?document.querySelector(".pagination-wrap").style.display="none":document.querySelector(".pagination-wrap").style.display="flex",0<e.matchingItems.length?document.getElementsByClassName("noresult")[0].style.display="none":document.getElementsByClassName("noresult")[0].style.display="block"});const xhttp=new XMLHttpRequest;xhttp.onload=function(){var e=JSON.parse(this.responseText);Array.from(e).forEach(function(e){companyList.add({id:'<a href="javascript:void(0);" class="fw-medium link-primary">#VZ'+e.id+"</a>",name:e.name,owner:e.owner,industry_type:e.industry_type,star_value:e.star_value,location:e.location,employee:e.employee,website:e.website,contact_email:e.contact_email,since:e.since,image_src:e.image_src}),companyList.sort("id",{order:"desc"}),refreshCallbacks()}),companyList.remove("id",'<a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a>')},xhttp.open("GET","assets/json/company-list.json"),xhttp.send(),isCount=(new DOMParser).parseFromString(companyList.items.slice(-1)[0]._values.id,"text/html"),document.querySelector("#company-logo-input").addEventListener("change",function(){var e=document.querySelector("#companylogo-img"),t=document.querySelector("#company-logo-input").files[0],a=new FileReader;a.addEventListener("load",function(){e.src=a.result},!1),t&&a.readAsDataURL(t)});var isValue=isCount.body.firstElementChild.innerHTML,idField=document.getElementById("id-field"),companyNameField=document.getElementById("companyname-field"),companyLogoImg=document.getElementById("companylogo-img"),ownerField=document.getElementById("owner-field"),industry_typeField=document.getElementById("industry_type-field"),star_valueField=document.getElementById("star_value-field"),locationField=document.getElementById("location-field"),employeeField=document.getElementById("employee-field"),websiteField=document.getElementById("website-field"),contact_emailField=document.getElementById("contact_email-field"),sinceField=document.getElementById("since-field"),addBtn=document.getElementById("add-btn"),editBtn=document.getElementById("edit-btn"),removeBtns=document.getElementsByClassName("remove-item-btn"),editBtns=document.getElementsByClassName("edit-item-btn"),table=(viewBtns=document.getElementsByClassName("view-item-btn"),refreshCallbacks(),document.getElementById("showModal").addEventListener("show.bs.modal",function(e){e.relatedTarget.classList.contains("edit-item-btn")?(document.getElementById("exampleModalLabel").innerHTML="Edit Company",document.getElementById("showModal").querySelector(".modal-footer").style.display="block",document.getElementById("add-btn").style.display="none",document.getElementById("edit-btn").style.display="block"):e.relatedTarget.classList.contains("add-btn")?(document.getElementById("exampleModalLabel").innerHTML="Add Company",document.getElementById("showModal").querySelector(".modal-footer").style.display="block",document.getElementById("edit-btn").style.display="none",document.getElementById("add-btn").style.display="block"):(document.getElementById("exampleModalLabel").innerHTML="List Company",document.getElementById("showModal").querySelector(".modal-footer").style.display="none")}),ischeckboxcheck(),document.getElementById("showModal").addEventListener("hidden.bs.modal",function(){clearFields()}),document.querySelector("#companyList").addEventListener("click",function(){refreshCallbacks(),ischeckboxcheck()}),document.getElementById("customerTable")),tr=table.getElementsByTagName("tr"),trlist=table.querySelectorAll(".list tr"),count=11;function ischeckboxcheck(){Array.from(document.getElementsByName("checkAll")).forEach(function(e){e.addEventListener("click",function(e){e.target.checked?e.target.closest("tr").classList.add("table-active"):e.target.closest("tr").classList.remove("table-active")})})}function refreshCallbacks(){Array.from(removeBtns).forEach(function(e){e.addEventListener("click",function(e){e.target.closest("tr").children[1].innerText,itemId=e.target.closest("tr").children[1].innerText;e=companyList.get({id:itemId});Array.from(e).forEach(function(e){var t=(deleteid=(new DOMParser).parseFromString(e._values.id,"text/html")).body.firstElementChild;deleteid.body.firstElementChild.innerHTML==itemId&&document.getElementById("delete-record").addEventListener("click",function(){companyList.remove("id",t.outerHTML),document.getElementById("deleteRecord-close").click()})})})}),Array.from(editBtns).forEach(function(e){e.addEventListener("click",function(e){e.target.closest("tr").children[1].innerText,itemId=e.target.closest("tr").children[1].innerText;e=companyList.get({id:itemId});Array.from(e).forEach(function(e){var t=(isid=(new DOMParser).parseFromString(e._values.id,"text/html")).body.firstElementChild.innerHTML;t==itemId&&(idField.value=t,companyLogoImg.src=e._values.image_src,companyNameField.value=e._values.name,ownerField.value=e._values.owner,industry_typeField.value=e._values.industry_type,star_valueField.value=e._values.star_value,locationField.value=e._values.location,employeeField.value=e._values.employee,websiteField.value=e._values.website,contact_emailField.value=e._values.contact_email,sinceField.value=e._values.since),console.log("x",e)})})}),Array.from(viewBtns).forEach(function(e){e.addEventListener("click",function(e){e.target.closest("tr").children[1].innerText,itemId=e.target.closest("tr").children[1].innerText;e=companyList.get({id:itemId});Array.from(e).forEach(function(e){(isid=(new DOMParser).parseFromString(e._values.id,"text/html")).body.firstElementChild.innerHTML==itemId&&(e=`
                        <div class="card-body text-center">
                            <div class="position-relative d-inline-block">
                                <div class="avatar-md">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="${e._values.image_src}" alt="" class="avatar-sm rounded-circle object-cover">
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-1">${e._values.name}</h5>
                            <p class="text-muted">${e._values.owner}</p>

                            <ul class="list-inline mb-0">
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-soft-success text-success fs-15 rounded">
                                        <i class="ri-global-line"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-soft-danger text-danger fs-15 rounded">
                                        <i class="ri-mail-line"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-soft-warning text-warning fs-15 rounded">
                                        <i class="ri-question-answer-line"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Information</h6>
                            <p class="text-muted mb-4">A company incurs fixed and variable costs such as the
                                purchase of raw materials, salaries and overhead, as explained by
                                AccountingTools, Inc. Business owners have the discretion to determine the
                                actions.</p>
                            <div class="table-responsive table-card">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium" scope="row">Industry Type</td>
                                            <td>${e._values.industry_type}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Location</td>
                                            <td>${e._values.location}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Employee</td>
                                            <td>${e._values.employee}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Rating</td>
                                            <td>${e._values.star_value} <i class="ri-star-fill text-warning align-bottom"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Website</td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    class="link-primary text-decoration-underline">${e._values.website}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Contact Email</td>
                                            <td>${e._values.contact_email}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Since</td>
                                            <td>${e._values.since}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    `,document.getElementById("company-view-detail").innerHTML=e)})})})}function clearFields(){companyLogoImg.src="assets/images/users/multi-user.jpg",companyNameField.value="",ownerField.value="",industry_typeField.value="",star_valueField.value="",locationField.value="",employeeField.value="",websiteField.value="",contact_emailField.value="",sinceField.value=""}function deleteMultiple(){ids_array=[];var e,t=document.getElementsByName("chk_child");for(i=0;i<t.length;i++)1==t[i].checked&&(e=t[i].parentNode.parentNode.parentNode.querySelector("td a").innerHTML,ids_array.push(e));"undefined"!=typeof ids_array&&0<ids_array.length?Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",cancelButtonClass:"btn btn-danger w-xs mt-2",confirmButtonText:"Yes, delete it!",buttonsStyling:!1,showCloseButton:!0}).then(function(e){if(e.value){for(i=0;i<ids_array.length;i++)companyList.remove("id",`<a href="javascript:void(0);" class="fw-medium link-primary">${ids_array[i]}</a>`);document.getElementById("checkAll").checked=!1,Swal.fire({title:"Deleted!",text:"Your data has been deleted.",icon:"success",confirmButtonClass:"btn btn-info w-xs mt-2",buttonsStyling:!1})}}):Swal.fire({title:"Please select at least one checkbox",confirmButtonClass:"btn btn-info",buttonsStyling:!1,showCloseButton:!0})}addBtn.addEventListener("click",function(e){""!==companyNameField.value&&""!==ownerField.value&&""!==industry_typeField.value&&""!==star_valueField.value&&""!==locationField.value&&""!==employeeField.value&&""!==websiteField.value&&""!==contact_emailField.value&&""!==sinceField.value&&(companyList.add({id:'<a href="javascript:void(0);" class="fw-medium link-primary">#VZ'+count+"</a>",image_src:companyLogoImg.src,name:companyNameField.value,owner:ownerField.value,industry_type:industry_typeField.value,star_value:star_valueField.value,location:locationField.value,employee:employeeField.value,website:websiteField.value,contact_email:contact_emailField.value,since:sinceField.value}),companyList.sort("id",{order:"desc"}),document.getElementById("close-modal").click(),clearFields(),refreshCallbacks(),count++,Swal.fire({position:"center",icon:"success",title:"Company inserted successfully!",showConfirmButton:!1,timer:2e3,showCloseButton:!0}))}),editBtn.addEventListener("click",function(e){document.getElementById("exampleModalLabel").innerHTML="Edit Company";var t=companyList.get({id:idField.value});Array.from(t).forEach(function(e){(isid=(new DOMParser).parseFromString(e._values.id,"text/html")).body.firstElementChild.innerHTML==itemId&&e.values({id:`<a href="javascript:void(0);" class="fw-medium link-primary">${idField.value}</a>`,image_src:companyLogoImg.src,name:companyNameField.value,owner:ownerField.value,industry_type:industry_typeField.value,star_value:star_valueField.value,location:locationField.value,employee:employeeField.value,website:websiteField.value,contact_email:contact_emailField.value,since:sinceField.value})}),document.getElementById("close-modal").click(),clearFields(),Swal.fire({position:"center",icon:"success",title:"Company updated Successfully!",showConfirmButton:!1,timer:2e3,showCloseButton:!0})}),document.querySelector(".pagination-next").addEventListener("click",function(){!document.querySelector(".pagination.listjs-pagination")||document.querySelector(".pagination.listjs-pagination").querySelector(".active")&&document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click()}),document.querySelector(".pagination-prev").addEventListener("click",function(){!document.querySelector(".pagination.listjs-pagination")||document.querySelector(".pagination.listjs-pagination").querySelector(".active")&&document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click()});