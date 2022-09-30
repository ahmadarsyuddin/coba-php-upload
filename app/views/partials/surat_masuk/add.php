    <template id="surat_masukAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Surat Masuk</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="surat_masuk/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('nomer_surat')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nomer_surat">Nomer Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nomer_surat"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Nomer Surat"
                                                    class="form-control "
                                                    type="text"
                                                    name="nomer_surat"
                                                    placeholder="Enter Nomer Surat"
                                                    />
                                                    <small v-show="errors.has('nomer_surat')" class="form-text text-danger">
                                                        {{ errors.first('nomer_surat') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tanggal_surat')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tanggal_surat">Tanggal Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.tanggal_surat"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Tanggal Surat"
                                                    name="tanggal_surat"
                                                    placeholder="Enter Tanggal Surat"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('tanggal_surat')" class="form-text text-danger">{{ errors.first('tanggal_surat') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('perihal_surat')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="perihal_surat">Perihal Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.perihal_surat"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Perihal Surat"
                                                    class="form-control "
                                                    type="text"
                                                    name="perihal_surat"
                                                    placeholder="Enter Perihal Surat"
                                                    />
                                                    <small v-show="errors.has('perihal_surat')" class="form-text text-danger">
                                                        {{ errors.first('perihal_surat') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tanggal_terima')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tanggal_terima">Tanggal Terima <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.tanggal_terima"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Tanggal Terima"
                                                    name="tanggal_terima"
                                                    placeholder="Enter Tanggal Terima"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('tanggal_terima')" class="form-text text-danger">{{ errors.first('tanggal_terima') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('file_surat')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="file_surat">File Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="file_surat"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/files/"
                                                        filenameformat="random" 
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="file_surat"
                                                        v-model="data.file_surat"
                                                        v-validate="{required:true}"
                                                        data-vv-as="File Surat"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('file_surat')" class="form-text text-danger">{{ errors.first('file_surat') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('diterima_oleh')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="diterima_oleh">Diterima Oleh <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.diterima_oleh"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Diterima Oleh"
                                                    class="form-control "
                                                    type="text"
                                                    name="diterima_oleh"
                                                    placeholder="Enter Diterima Oleh"
                                                    />
                                                    <small v-show="errors.has('diterima_oleh')" class="form-text text-danger">
                                                        {{ errors.first('diterima_oleh') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('catatan')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="catatan">Catatan <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.catatan"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Catatan"
                                                    class="form-control "
                                                    type="text"
                                                    name="catatan"
                                                    placeholder="Enter Catatan"
                                                    />
                                                    <small v-show="errors.has('catatan')" class="form-text text-danger">
                                                        {{ errors.first('catatan') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="saving" color="#fff" size="15px"></clip-loader>
                                            </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var Surat_MasukAddComponent = Vue.component('surat_masukAdd', {
		template : '#surat_masukAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'surat_masuk',
			},
			routename : {
				type : String,
				default : 'surat_masukadd',
			},
			apipath : {
				type : String,
				default : 'surat_masuk/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					nomer_surat: '',tanggal_surat: '',perihal_surat: '',tanggal_terima: '',file_surat: '',diterima_oleh: '',catatan: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Surat Masuk';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/surat_masuk');
			},
			resetForm : function(){
				this.data = {nomer_surat: '',tanggal_surat: '',perihal_surat: '',tanggal_terima: '',file_surat: '',diterima_oleh: '',catatan: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
