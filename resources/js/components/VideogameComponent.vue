<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Sottotitolo</th>
                    <th scope="col">Rating</th>
                    <th v-if="user">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="videogame in videogames" :key='videogame.id'>
                    <td>{{ videogame.title }}</td>
                    <td>{{ videogame.subtitle }}</td>
                    <td>{{ videogame.rating }}</td>
                    <td v-if="user">
                        <!-- <a class="btn btn-danger" :href="`api/list/videogame/delete/${videogame.id}` ">Delete</a> -->
                        <button @click="eventDelete(videogame.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function() {

            return {
                videogames: []
            };
        },
        props: {
            user: String
        },
        methods: {

            eventDelete(id) {

                axios.get(`api/list/videogame/delete/${id}`)
                    .then(r => {
                        const ind = this.getIndexById(id)
                        this.videogames.splice(ind, 1);
                    })
                    .catch(e => console.error(e));
            },

            getIndexById(id) {
                for (let x=0; x<this.videogames.length; x++) {
                    const videogame = this.videogames[x];

                    if(videogame.id == id)
                        return x;   
                }

                return -1;
            }
        },
        mounted() {
            
            axios.get('api/list/videogame')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.error(e));
        }
    }
</script>
