<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pusher File</title>
</head>
<body>
    <h1>Welcome</h1>
    <ul id="users">
        <li v-repeat="user:users">
            @{{ user.name }}
        </li>
    </ul>

    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.9/vue.js"></script>
    <script>
        new Vue({
            el: '#users',
            data:{
                users:[]
            },
            ready:function(){
                var pusher = new Pusher('eac2641ea059cc85dd7d', {
                    encrypted: true
                });

                pusher.subscribe('test')
                        .bind('App\\Events\\UserHasfavorited', this.addUser);
            },
            methods:{
                addUser:function(user){
                    this.users.push(user);
                }
            }

        })
    </script>
</body>
</html>