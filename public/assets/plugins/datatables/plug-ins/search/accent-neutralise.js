jQuery.fn.DataTable.ext.type.search.string = function ( data ) {		
    return ! data ?
        '' :
        typeof data === 'string' ?
            data.replace( /[àáạãảâầấậẫẩăằắặặẵäåæ]/g, 'a' ) 	
	        	.replace( /[ç]/g, 'c' )            	
	        	.replace( /[đ]/g, 'd' )
	        	.replace( /[èéẹẻẽêềếệểễë]/g, 'e' )
	        	.replace( /[ìíịỉĩîï]/g, 'i' )
	        	.replace( /[ñ]/g, 'n' )            	
	        	.replace( /[òóọỏõôồốộổỗöơờớợởỡø]/g, 'o' )            	
	            .replace( /[ùúụủũưứừựữửûü]/g, 'u' )
	            .replace( /[ỳýỵỷỹÿ]/g, 'y' )
            	.replace( /[ÀÁẠÃẢÂẦẤẬẪẨĂẰẮẶẶẴÄÅÆ]/g, 'A' )
            	.replace( /[ß]/g, 'B' ) 
            	.replace( /[Ç]/g, 'C' )            	
            	.replace( /[Đ]/g, 'D' )
            	.replace( /[ÈÉẸẺẼÊỀẾỆỂỄË]/g, 'E' )
            	.replace( /[ÌÍỊỈĨÎÏ]/g, 'I' )
            	.replace( /[Ñ]/g, 'N' )            	
            	.replace( /[ÒÓỌỎÕÔỒỐỘỔỖÖƠỜỚỢỞỠØ]/g, 'O' )            	
                .replace( /[ÙÚỤỦŨƯỨỪỰỮỬÛÜ]/g, 'U' )
                .replace( /[ỲÝỴỶỸŸ]/g, 'Y' ):
            data;
};