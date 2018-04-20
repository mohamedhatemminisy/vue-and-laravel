<template>
  <div>
	<nav class="panel column is-offset-2 is-8">
  <p class="panel-heading">
    vue project

     <button class="button is-link is-outlined" @click="openAdd">
     Add Blog 
    </button>

    <span class="is-pulled-right" v-if="loading">
    <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
    </span>
  </p>

  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
      <span class="icon is-small is-left">
        <i class="fas fa-search"></i>
      </span>
    </p>
  </div>

<!-- here i will make a for each for data saved in db -->
  <a  class="panel-block" v-for="item,key in temp">
    <span class="column is-9">
      <!-- to display data -->
          {{item.name}}
    </span>
     <!-- delete icon -->
    <span class="panel-icon column is-1">
        <!-- I will use del not delete bcacue delete is a key word -->
      <i class="has-text-danger fa fa-trash" aria-hidden="true" @click="del(key,item.id)"></i>
    </span>
         <!-- edit icon -->
    <span class="panel-icon column is-1">
      <i class="has-text-info fa fa-edit" aria-hidden="true"  @click="openUpdate(key)"></i>
    </span>
         <!-- show icon -->
    <span class="panel-icon column is-1">
            <!--to show more data we click on show button and i pass key to open show function to get data required -->
      <i class="has-text-primary fa fa-eye" aria-hidden="true" @click="openShow(key)"></i>
    </span>


  </a>

</nav>
      <!-- we use component here -->

<Add :openmodel='addActive' @closeRequest='close'></Add>

<Show :openmodel='showActive' @closeRequest='close'></Show>

<Update :openmodel='updateActive' @closeRequest='close'></Update>

</div>
</template>
    {{-- because I wanna to call add method in home only i will call it here --}}
<script>

 // we import components here
 
  let Add   = require('./BlogAdd.vue');

  let Show   = require('./Show.vue');

  let Update   = require('./Update.vue');
   
   export default{
    components:{Add,Show,Update},

    data(){
      return{
        // this is used to reurn data
        
          addActive : '',
          showActive : '',
          updateActive : '',
          lists:{},
          errors:{},
          loading:false,
          searchQuery  : '',
          temp  : ''

      }
    },
    // to display result of search 
    watch:{
       searchQuery(){
        // console.log(this.searchQuery)
        if(this.searchQuery.length >0){
          // filter will create new arry 
          // i use the temp as a temparry attribut to store data in
         this.temp = this.lists.filter((item) =>{

         return Object.keys(item).some((key)=>{
            let string = String(item[key])
             return string.toLowerCase().indexOf(this.searchQuery.
              toLowerCase())>-1
          })
            
          });
         // console.log(result);
          
        }else{
          this.temp = this.lists
        }
       }
    },

     // I will use this method to display data
    mounted(){
            axios.post('/getblog').
            then((response)=> this.lists= this.temp = response.data)
            .catch((error)=> this.errors=error.response.data.errors)
    },
     methods:{
      // i use this method to open the form of add data
      openAdd(){
        this.addActive ='is-active';
      }, 
     openShow(key){
      // i used child arry 1 becacuse i have add and show but i need show method
        this.$children[1].list=this.lists[key]
        this.showActive ='is-active';
      },
     openUpdate(key){
      // i used child arry 2 becacuse i have add and show but i need show method
        this.$children[2].list=this.lists[key]
        this.updateActive ='is-active';
      },
      // it use this method to to remove the form after add or show data
      close(){
        this.addActive =this.showActive = this.updateActive = ''
      },
      del(key,id){
        if(confirm("Are You Sure ?")){
          // if you want to delete entity show loading icone 
             this.loading=!this.loading
            axios.delete(`/phonebook/${id}`).
            then((response)=> {this.lists.splice(key,1);this.loading=!this.loading})
            .catch((error)=> this.errors=error.response.data.errors)
          }
      }
    }
   }
</script>