<template>
	
	<div class="modal" :class='openmodel'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add new entry</p>

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
  <label class="label">Phone</label>
  <div class="control">
           <!--  here the input text will be red if we have error in it-->

    <input class="input" :class="{'is-danger':errors.phone}" type="text" placeholder="Phone" v-model="list.phone">
  </div>
  <small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control">
           <!--  here the input text will be red if we have error in it-->

    <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Email" v-model="list.email">
  </div>
  <small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
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
          phone:'',
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
            axios.post('/phonebook', this.$data.list).then((response)=>
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