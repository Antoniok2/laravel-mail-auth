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
                    <td v-if="user">AZIONE</td>
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
        mounted() {
            
            axios.get('api/list/videogame')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.error(e));
        }
    }
</script>
