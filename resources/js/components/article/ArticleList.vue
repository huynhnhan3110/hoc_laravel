<template>
    <div class="container">
    <div v-if="loading">Dang tai du lieu...</div>
    <table  class="table table-bordered" v-if="!loading"> 
        <tr>
            <th>Ten bai viet</th>
            <th></th>
            <th></th>
        </tr>
        <tr v-for="(article,index) in articles">
            <td>
                <span v-show="currentIndex != index">{{ article.title }}</span>
                <input type="text" v-model="article.title" v-show="currentIndex == index">
            </td>
            <td width="40">
                <button v-show="currentIndex != index" @click="currentIndex = index">Sua</button>
                <button v-show="currentIndex == index" @click="updateArticle(article)">Xong</button>
            </td>
            <td width="40"><button @click="deleteArticle(article, index)">Xoa</button></td>
        </tr>
    </table>
    <div>
        <button href="#" @click="currentPage = pageNumber" v-for="pageNumber in totalPages">{{ pageNumber }}</button>
    </div>
    <div>
        <paginate
        :page-count="20"
        :click-handler="clickPageNumber"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :next-class="'page-link'"
        :prev-class="'page-link'"

        :container-class="'pagination'"
        :pageClass="'page-item'"
        :pageLinkClass="'page-link'">
        </paginate>
    </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                articles: [],
                totalPages: 0,
                loading: false,
                currentPage: 1,
                currentIndex: null
                
            }
        },
        mounted() {
            this.getData();

        },
        watch: {
            currentPage: function() {
                console.log('currenPage change');
                this.getData();
            }
        },
        methods: {
            getData() {
                this.loading = true;
                axios.get('/api/list?page='+this.currentPage)
                .then( (response) => {
                    // handle success
                    this.articles = response.data.data;
                    this.loading = false;
                    this.totalPages = response.data.last_page;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            deleteArticle(article, index) {
                axios.post('/api/delete', {
                    id: article.id
                })
                .then((response) => {
                    // handle success
                    console.log('delete sucess');
                    this.articles.splice(index,1);
                })
            },
            updateArticle(article) {
                axios.post('/api/update', article)
                .then((response) => {
                    this.currentIndex = null;
                })
            },
            clickPageNumber (pageNum) {
                this.currentPage = pageNum;
            }
        }
    }
</script>