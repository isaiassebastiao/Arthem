import { core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";

    var getAllReportedArtists = async()=>{
        const server_response = await core('getAllReportedArtists', null);
        if(server_response.success){
            fillReportsTable(server_response.data);
        }
    }


    var fillReportsTable = reports =>{

        tableBody.innerHTML = ``;

        reports.forEach(report=>{
            
            tableBody.innerHTML += `
                <tr>
                    <td><img src="../../../${report.artwork_path}"></td>
                    <td data-Label="Artista">${report.nome}</td>
                    <td data-Label="Motivo">${report.reason}</td>
                    <td data-Label="Data">${report.reported_at}</td>
                    ${
                        (report.report_status == 'pendente') 
                        ? `<td class="active" data-Label="Status">${report.report_status}</td>` 
                        : `<td class="inactive" data-Label="Status">${report.report_status}</td>`
                    }
                    <td data-Label="Ações">
                        ${
                            (report.report_status !== 'pendente')
                            ? `<button data-id="${report.artist_id}" class="view report-button" id="view">Ver</button>`
                            : 
                            `
                                <button data-artwork="${report.artwork_id}" class="view report-button" id="view">Ver</button>
                                <button data-artwork="${report.artwork_id}" data-name="${report.title}" data-artist="${report.nome}" data-report="${report.id}" class="delete report-button" id="disable">Desactivar</button>

                            `
                        }
                    </td>
                </tr>
            `; 
            //console.log(report);
        });

        reportsTableActions();
    }

    var reportsTableActions = ()=>{


        const view_reported_artist_artwork = [...document.querySelectorAll('.view')];

        view_reported_artist_artwork.forEach(view_reported_artist_artwork_button=>{
            view_reported_artist_artwork_button.addEventListener('click', ()=>{
                
                artworks_modal.style.display = 'flex';
                view_artwork_modal.style.display = 'flex';
                close_publish_artwork_modal.style.display = 'block';
        
                delete_artwork_modal.style.display = 'none';

                const artwork_id = view_reported_artist_artwork_button.dataset.artwork;

                const form_data = new FormData();
                form_data.set('artwork_id', artwork_id);

                viewReportedArtistArtwork(form_data);

            });
        });


        const delete_reported_artist_artwork = [...document.querySelectorAll('.delete')];
        delete_reported_artist_artwork.forEach(delete_reported_artist_artwork_button=>{
            delete_reported_artist_artwork_button.addEventListener('click', ()=>{
        
                const artwork_name = delete_reported_artist_artwork_button.dataset.name;
                const artist_name = delete_reported_artist_artwork_button.dataset.artist;

                artworks_modal.style.display = 'flex';
                delete_artwork_modal.style.display = 'flex';
        
                view_artwork_modal.style.display = 'none';
                close_publish_artwork_modal.style.display = 'none';


                delete_artwork_modal.innerHTML = `
                    <div><strong>Confirmar Desactivar Obra</strong></div>
                    <div><p>A obra <span class="caution">${artwork_name}</span> será desactivada da galeria de <span class="caution">${artist_name}</span>, impossibilitando ele de realizar a venda, tem certeza que quer desabilitar esta Obra de Arte ?</p></div>
                    <div style="display: flex; gap:10px; justify-content:center;">
                        <button id="confirm_delete">Sim</button>
                        <button id="cancel_delete">Não</button>
                    </div>
                `;

                const report_id = delete_reported_artist_artwork_button.dataset.report;
                const artwork_id = delete_reported_artist_artwork_button.dataset.artwork;

                confirm_delete.addEventListener('click', async()=>{

                    disableReportedArtistArtwork(artwork_id, report_id);

                    artworks_modal.style.display = 'none';
                    delete_artwork_modal.style.display = 'none';

                });
        
                cancel_delete.addEventListener('click', ()=>{
                    artworks_modal.style.display = 'none';
                });
            });
        });

    }


    var viewReportedArtistArtwork = async form_data =>{

        const server_response = await core('getReportFromArtist', form_data);

        if(!server_response.success){
            return warnings(server_response);
        }
        
        const artwork = server_response.data;

        view_artwork_modal.innerHTML = `    
            <div><img id="image" src="../../../${artwork.artwork_path}" alt="${artwork.title}"></div>
            <div><strong>Título: </strong><span>${artwork.title}</span></div>
            <div><strong>Autor: </strong><span>${artwork.nome}</span></div>
            <div><strong>Motivo de denúncia: </strong><span class="height-and-width">${artwork.reason}</span></div>
            <div><strong>Descrição da denúncia: </strong><span>${artwork.description}</span></div>
        `;
    }

    var disableReportedArtistArtwork = async (artwork_id, report_id) =>{

        const form_data = new FormData();
        form_data.set('artwork_id', artwork_id);
        form_data.set('report_id', report_id);

        const server_response = await core('disableReportedArtistArtwork', form_data);
        warnings(server_response);
        getAllReportedArtists();
    }

    getAllReportedArtists();