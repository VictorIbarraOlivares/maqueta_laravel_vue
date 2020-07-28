<template>
    <div>
        <h4>Formulario</h4>
        <el-form ref="form" :model="form" label-position="top" :rules="rules">
            <el-row :gutter="20">

                <el-col :span="16">
                    <el-card class="mt-4" >

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Fecha Documento" prop="fecha_documento">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_documento" 
                                        :value="form.fecha_documento" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>

                            <el-col :span="12">
                                <el-form-item label="Proveedor">
                                    <el-input v-model="form.proveedor" ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Tipo Documento" prop="tipo_documento">
                                    <el-select v-model="form.tipo_documento" placeholder="Por favor seleccione">
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="N° Documento" prop="numero_documento">
                                    <el-input v-model.number="form.numero_documento" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Orden de Compra" prop="orden_de_compra">
                                    <el-input v-model="form.orden_de_compra" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Monto Total" prop="monto_total">
                                    <el-input v-model="form.monto_total" placeholder="IVA incluido" @input="formatNumber" ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Observación">
                                    <el-input type="textarea" v-model="form.observacion"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

                <el-col :span="8">
                    <el-card class="mt-4" >

                        <el-row >
                            <el-col :span="12">
                                <el-form-item label="Fecha Recepción" prop="fecha_recepcion">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_recepcion" 
                                        :value="form.fecha_recepcion" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Centro de Salud" prop="centro_de_salud">
                                    <el-select v-model="centroSaludIndex" placeholder="Por favor seleccione" @change="selectCentroSalud" style="width: 100%;">
                                        <el-option
                                            v-for="(centro, index) in centrosSalud"
                                            :key="centro.value"
                                            :label="centro.label"
                                            :value="index" >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Responsable Recepción" prop="responsable_recepcion" v-if="responsablesRecepcion.length">
                                    <el-select v-model="form.responsable_recepcion" placeholder="Por favor seleccione" style="width: 100%;" >
                                        <el-option
                                            v-for="responsable in responsablesRecepcion"
                                            :key="responsable.value"
                                            :label="responsable.label"
                                            :value="responsable.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

            </el-row>

            <el-row :gutter="20">

                <el-col :span="16">
                    <el-card class="mt-4" >
                        <div slot="header" class="clearfix">
                            <span>Adjuntar archivos de respaldo de recepción original, que incluya al menos una identificación del responsable</span>
                        </div>

                        <el-row :gutter="20">
                            <el-col :span="24">

                                <el-upload
                                    class="upload-demo"
                                    action="/test"
                                    :on-change="handleChange"
                                    :auto-upload="false"
                                    :on-preview="handlePreview"
                                    :on-remove="handleRemove"
                                    accept=".pdf"
                                    multiple
                                    :limit="3"
                                    :on-exceed="handleExceed"
                                    :file-list="fileList" >
                                    <el-button size="small" type="primary">Clic para subir archivo</el-button>
                                    <div slot="tip" class="el-upload__tip">Solo archivos pdf con un tamaño menor de 500kb. Máximo 3 archivos.</div>
                                </el-upload>

                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

                <el-col :span="8">
                    <el-form-item class="mt-5" >
                        <el-button type="primary" @click.prevent="submitForm('form')" ><i class="el-icon-s-claim"></i> Guardar</el-button>
                    </el-form-item>
                </el-col>

            </el-row>
        </el-form>

    </div>
</template>

<script>

export default {
  data () {
    return {
        form: {
            fecha_documento: '',
            proveedor: '',
            tipo_documento: '',
            numero_documento: '',
            orden_de_compra: '',
            monto_total: '',
            observacion: '',

            fecha_recepcion: '',
            centro_de_salud: '',
            responsable_recepcion: '',
            archivos: []
        },

        options: [
            {
                value: '1', // id
                label: 'Guía de Despacho'
            }, {
                value: '2',
                label: 'Cedible'
            }
        ],

        centrosSalud: [
            {
                value: '1',
                label: 'Cerro Navia',
                responsablesRecepcion: [
                    {
                        value: '1',
                        label: 'Alberto Fuenzalida',
                        centro_salud: '1'
                    },
                    {
                        value: '3',
                        label: 'Teresa Perez',
                        centro_salud: '1'
                    },
                    {
                        value: '4',
                        label: 'Carlos Gonzalez',
                        centro_salud: '1'
                    },
                ]
            },
            {
                value: '2',
                label: 'Quilicura',
                responsablesRecepcion: [
                    {
                        value: '6',
                        label: 'Juan Gomez',
                        centro_salud: '2'
                    },
                    {
                        value: '7',
                        label: 'Jaime Vidal',
                        centro_salud: '2'
                    },
                ]
            }
        ],

        centroSaludIndex: '',
        responsablesRecepcion: [],

        fileList: [
            // {name: 'recepción_timbrada.pdf', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}, 
            // {name: 'copia_dte.pdf', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}
        ],

        rules: {
            fecha_documento: [
                { type: 'date', required: true, message: 'Ingrese una fecha', trigger: 'change' }
            ],

            tipo_documento: [
                { required: true, message: 'Debe seleccionar uno', trigger:'change' }
            ],
            numero_documento: [
                { required: true, message: 'Ingrese el número del documento', trigger:'blur' },
                { type: 'number', message: 'Debe ser un número', trigger:'blur' }
            ],
            orden_de_compra: [
                { required: true, message: 'Ingrese la orden de compra del documento', trigger:'blur' },
            ],
            monto_total: [
                { required: true, message: 'Ingrese el monto del documento', trigger:'blur' },
                // { type: 'number', message: 'Debe ser un número', trigger:'blur' }
            ],
            fecha_recepcion: [
                { type: 'date', required: true, message: 'Ingrese una fecha', trigger: 'change' }
            ],
            centro_de_salud: [
                { required: true, message: 'Debe seleccionar uno', trigger:'change' }
            ],
            responsable_recepcion: [
                { required: true, message: 'Debe seleccionar uno', trigger:'change' }
            ],
        }
    }
  },
  methods: {
    selectCentroSalud() {
        this.form.responsable_recepcion = '';
        this.form.centro_de_salud = this.centrosSalud[this.centroSaludIndex].value;
        this.responsablesRecepcion = this.centrosSalud[this.centroSaludIndex].responsablesRecepcion;
    },
    submitForm(formName) {

        this.$refs[formName].validate((valid) => {

            if (valid) {

                if ( this.fileList.length === 0 ) {
                    this.$message({
                        dangerouslyUseHTMLString: true,
                        message: '<strong>Debe adjuntar al menos un archivo.</strong>',
                        type: 'error',
                        offset: 82
                    });
                    return false;
                }

                if ( this.form.monto_total == 0 ) {
                    
                    this.$message({
                        dangerouslyUseHTMLString: true,
                        message: '<strong>Debe ingresar un Monto Total mayor a 0</strong>',
                        type: 'error',
                        offset: 82
                    });
                    return false;
                }

                alert('submit!');
            } else {
                console.log('error submit!!');
                return false;
            }

        });

    },
    handleChange(file, fileList) {
        console.log('handleChange')
        console.log(file);
        console.log(fileList);
        this.fileList = fileList.slice(-3);
        console.log(fileList);
    },
    handleRemove(file, fileList) {
        console.log(file, fileList);
    },
    handlePreview(file) {
        console.log(file);
    },
    handleExceed(files, fileList) {
        this.$message.warning(`El límite es 3, haz seleccionado ${files.length} archivos esta vez, añade hasta ${files.length + fileList.length}`);
    },
    formatNumber() {
        
        let number = this.form.monto_total != '' ? this.form.monto_total.replace(/\./g, '').replace(/[^\d\.]*/g, '') : 0;
        
        if ( ! isNaN(number) ){
			number = number || 0;
			let places = ! isNaN(places = Math.abs(places)) ? places : 0;
			let symbol = symbol !== undefined ? symbol : "";
			let thousand = thousand || ".";
			let decimal = decimal || ",";
			let negative = number < 0 ? "-" : "";
			let i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "";
			let j = (j = i.length) > 3 ? j % 3 : 0;
			this.form.monto_total = symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
        } 
        // else {
        //     // No sirve el else, porque siempre será un numero 
		// 	// toastr["warning"]("Solo se permiten numeros");
        //     // toastr.warning("Solo se permiten números", "Atención", optionsToastr);
            
        //     number = number.replace(/[^\d\.]*/g, '');
		// 	this.form.monto_total = this.formatNumber(number);
        // }
    }
  }
}

</script>