import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';
import pickBy from 'lodash/pickBy';
import { usePrevious } from '@/Core/Previous';

const Transaction = (props) =>{
    const [transaction, setTransaction] = useState(props.transaction.data);
    const [activepage, setActivePage] = useState('');
    const [links, setLinks] = useState(props.transaction.links);

    const [values, setValues] = useState({
        fdat:  '',
        tdat:  ''
    });

    const prevValues = usePrevious(values);

    useEffect(() => {
        if (prevValues) {
            const query = Object.keys(pickBy(values)).length ? pickBy(values) : { remember: 'forget' };
            Inertia.get(route(route().current()), query, {
                replace: true,
                preserveState: true
            });
        }
    }, [values]);


    useEffect(()=>{
        setTransaction(props.transaction.data);
        setLinks(props.transaction.links);
        props.transaction.links && props.transaction.links.map((l)=>{
            if(l.active){
                setActivePage(parseInt(l.label));
            }
        })
    },[props.transaction])


    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value;
    
        setValues(values => ({
          ...values,
          [key]: value
        }));
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Transaction History" path="Payment" pathurl="" />
            <Panel title="View Transaction History" md="10">
                <div className="row pt-2 pb-2 form-group m-0">
                    <div className="col-md-3 pe-1">

                    </div>
                    <div className="col-md-3 pe-1">
                        
                    </div>
                    <div className="col-md-3 pe-1">
                        <input style={{height:'35px'}} onChange={handleChange} name="fdat" type="date" className='form-control' placeholder='Select From Date' />
                    </div>
                    <div className="col-md-3 ">
                    <input type="date" style={{height:'35px'}} onChange={handleChange} name="tdat"  className='form-control' placeholder='Select To Date' />
                    </div>
                </div>
                <div className="table-responsive-md">
                    <table className='table mb-0'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>#</th>
                                <th>User Name</th>
                                <th>Package Name</th>
                                <th className='text-center'>Transaction ID</th>
                                <th className='center'>Purchase Date</th>
                            </tr>
                            {
                                transaction && transaction.map((p, i)=>{
                                    return <tr key={i}>
                                        <td className='text-center'>{i +  activepage * props.transaction.per_page - 1}</td>
                                        <td>{p.name}</td>
                                        <td>{p.pack}</td>
                                        <td className='text-center'>{p.transaction_id}</td>
                                        <td className='text-center'>{p.dat}</td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
                { links.length === 3 ? '' :
                   <div className="card-footer">
                        <div className="row">
                            
                            <div className="col-md-12">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
            </Panel>
        </Authenticated>
    )
}
export default Transaction