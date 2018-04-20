<template>
	
	<div class="modal" :class='openmodel'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add new blog</p>

      <!--  when i click in that button the close function will be hired and go to close method-->

      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">

<div class="field">
  <label class="label">Name</label>
  <div class="control">
       <!--  here the input text will be red if we have error in it-->

    <input class="input" :class="{'is-danger':errors.name}" type="text"  placeholder="Name" v-model="list.name">
  </div>
   <!--  here i will show the error of that text-->
  <small v-if="errors.name" class="has-text-danger">{{ errors.name[0]}}</small>
</div>

<div class="field">
  <label class="label">Description</label>
  <div class="control">
           <!--  here the input text will be red if we have error in it-->

    <textarea class="textarea"  :class="{'is-danger':errors.description}" placeholder="Description" v-model="list.description"></textarea>
   </div>
  <small v-if="errors.description" class="has-text-danger">{{errors.description[0]}}</small>
</div>

<div class="file">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
  </label>
</div>
 
    </section>
    <footer class="modal-card-foot">
      <!--  when i click in that button the save function will be hired and go to save method-->

      <button class="button is-success" @click='save'>Save</button>
      <!--  when i click in that button the close function will be hired and go to close method and call $emit function and then go to closeRequest located in home vue-->

      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>
</template>

<script>
	
	export default{
		props:['openmodel'],

    data(){
      return{
        list:{
          name :'',
          description:'',
          email:''
        },
        errors:{}
      }
    },
		methods:{
      // to close form
			close(){
				this.$emit('closeRequest')
			},
      // to save data
      save(){
            axios.post('/blog', this.$data.list).then((response)=>
             {
            this.close()
            this.$parent.lists.push(response.data)
            // to store data according to name 
            
            this.$parent.lists.sort(function(a,b){
                    if(a.name > b.name){
                      return -1;
                    }else if(a.name < b.name){

                      return 1;
                    }

                 })
            this.list = ''
            })
              
              .catch((error)=> this.errors=error.response.data.errors)
      }
		}
	}
</script>