<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component. {{name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Echo from "laravel-echo";
window.io = require("socket.io-client");
if (typeof io !== 'undefined') {
    console.log('realizando conexao ')
    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001',
    });
}

    export default {
        data(){
            return{
                name: '',
            }
        },
        // mounted() {
        //     console.log('Component mounted.')
        // }
        created(){
            // console.log(Echo)
            window.Echo.channel('testehito').listen('MessagePushed' , e => {
                console.log('Logando evento pusher teste');
                console.log(e.data.data.username);
                this.name = e.data.data.username;
            })
            // Echo.channel('testehito' , function (data) {
            //     console.log(data)
            // }.bind(this))
            // console.log('tentando receber eventos do socket io channel => ' + 'agent-channel.'+ this.user.agente_id +':App\\Events\\AgentCreated')
			// Echo.channel('testehito' , function (data) {
			// 	console.log(data)	
			// 	// this.objret = data.agent
            // }.bind(this))
            // Echo.channel('testehito')
            // .listen('OrderShipped', (e) => {
            //     console.log(e);
            // });
		},
    }
</script>
