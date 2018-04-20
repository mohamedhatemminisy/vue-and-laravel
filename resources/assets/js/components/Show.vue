<template>
	
	<div class="modal" :class='openmodel'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{list.name}}'s show details</p>

      <!--  when i click in that button the close function will be hired and go to close method-->

      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
      <!--   Iam here show the name filed -->
      <li class="panel-block">
        <label class="column is-3"><b>Name</b></label>{{list.name}}
      </li>

     <!-- i'm here show the phone filed -->

     <li class="panel-block">
       <label class="column is-3"><b>Phone</b></label>{{list.phone}}
    </li>

    <!-- i'm here will use email -->

    <li class="panel-block">
      <label class="column is-3"><b>Email</b></label>{{list.email}}
    </li>

    </section>
    <footer class="modal-card-foot">

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
       return {
        list:''
       }
      },
      methods:{
      // to close form
      close(){
        this.$emit('closeRequest')
      },
    }

  }

</script>