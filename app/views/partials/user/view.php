    <template id="userView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  User</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div v-show="!loading">
                                    <div ref="datatable" id="datatable">
                                        <table class="table table-hover table-borderless table-striped">
                                            <!-- Table Body Start -->
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Id User :</th>
                                                    <td class="value"> {{ data.id_user }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> User Name :</th>
                                                    <td class="value"> {{ data.user_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Password :</th>
                                                    <td class="value"> {{ data.password }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Nama Pengguna :</th>
                                                    <td class="value"> {{ data.nama_pengguna }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Email :</th>
                                                    <td class="value"> {{ data.email }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Ddddd :</th>
                                                    <td class="value"> {{ data.ddddd }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/user/edit/'  + data.id_user">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/user/delete/' + data.id_user">
                                            <i class="fa fa-times"></i> </button>
                                        </span>
                                        <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                            <i class="fa fa-save"></i> 
                                        </button>
                                    </div>
                                </div>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var UserViewComponent = Vue.component('userView', {
		template : '#userView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'user',
			},
			routename : {
				type : String,
				default : 'userview',
			},
			apipath: {
				type : String,
				default : 'user/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id_user: '',user_name: '',password: '',nama_pengguna: '',email: '',ddddd: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  User';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id_user: '',user_name: '',password: '',nama_pengguna: '',email: '',ddddd: '',
				}
			},
		},
	});
	</script>
