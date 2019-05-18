using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Data.SqlClient;
using System.Globalization;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAuthorizeAttribute]
    public class Styles_Users_QuotationsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // File báo giá
        [HttpGet]
        [Route("api/GetStyles_Users_Quotations/{idLocation}/{idCatalog}/{fromDate}/{toDate}/{lang}/{type}")]
        public HttpResponseMessage GetStyles_Users_Quotations(int idLocation, int idCatalog, string fromDate, string toDate, string lang, string type)
        {
            try
            {
                DateTime FromDate = Convert.ToDateTime(fromDate.ToString());
                DateTime ToDate = Convert.ToDateTime(toDate.ToString());
                var list = db.Database.SqlQuery<ListQuotation>(@"[dbo].[st_AUC_List_Quotations_By_IDCatalog_IDLocation_Type_DateRange] @ID_Catalog,@ID_Location,@LanguageCode,@Type,@FromDate,@ToDate",


                    new SqlParameter("Type", type),
                    new SqlParameter("ID_Catalog", idCatalog.ToString()),
                    new SqlParameter("ID_Location", idLocation.ToString()),
                    new SqlParameter("FromDate", FromDate.ToString("yyyy-MM-dd HH:mm:ss", CultureInfo.InvariantCulture)),
                    new SqlParameter("ToDate", ToDate.ToString("yyyy-MM-dd HH:mm:ss", CultureInfo.InvariantCulture)),
                    new SqlParameter("LanguageCode", lang)
                    ).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    });
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }


        //Lịch sử download theo file
        [HttpGet]
        [Route("api/GetStyles_Users_History_Quotations/{lang}/{type}/{idUser}")]
        public HttpResponseMessage GetStyles_Users_History_Quotations(string lang, int type, int idUser)
        {
            try
            {

                if (type == 0)
                {
                    var list =
                   (from q in db.Styles_Users_Quotations
                    join qa in db.Styles_Users_Quotations_Actions on q.ID_Quotation equals qa.ID_Quotation
                    where qa.Status == "d" &&
                    q.IsInTrash == false &&
                    q.IsType == false &&
                    qa.ID_User == idUser
                    select new
                    {
                        CompanyName = (from u in db.Styles_Users
                                       where u.ID_User == q.ID_User
                                       select u.CompanyName),
                        Logo = (from u in db.Styles_Users
                                where u.ID_User == q.ID_User
                                select u.Logo),
                        ID_Store = (from u in db.Styles_Users
                                    where u.ID_User == q.ID_User
                                    select u.UserName),
                        Q = q,
                        idUserOwner = q.ID_User,
                        QA = qa
                    }).OrderByDescending(x => x.QA.AddTime).ToList();

                    var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel()
                        {
                            status = true,
                            data = list,
                            error_message = ""
                        });
                    return resp;
                }
                else
                {
                    var list =
                   (from q in db.Styles_Users_Quotations
                    join qa in db.Styles_Users_Quotations_Actions on q.ID_Quotation equals qa.ID_Quotation
                    where qa.Status == "d" &&
                    q.IsInTrash == false &&
                    q.IsType == true &&
                    qa.ID_User == idUser
                    select new
                    {
                        CompanyName = (from u in db.Styles_Users
                                       where u.ID_User == q.ID_User
                                       select u.CompanyName),
                        Logo = (from u in db.Styles_Users
                                where u.ID_User == q.ID_User
                                select u.Logo),
                        ID_Store = (from u in db.Styles_Users
                                    where u.ID_User == q.ID_User
                                    select u.UserName),
                        Q = q,
                        idUserOwner = q.ID_User,
                        QA = qa
                    }).OrderByDescending(x => x.QA.AddTime).ToList();

                    var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel()
                        {
                            status = true,
                            data = list,
                            error_message = ""
                        });
                    return resp;
                }

            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Lịch sử download báo giá tất cả
        [HttpGet]
        [Route("api/GetStyles_Users_History_QuotationsLinkAll/{lang}/{idUser}")]
        public HttpResponseMessage GetStyles_Users_History_QuotationsLinkAll(string lang, int idUser)
        {
            try
            {

                var list = db.Database.SqlQuery<ListQuotationActions>("SELECT * FROM Styles_Users_Quotations_Actions where Status = 'a' and ID_User='" + idUser + "'  order by AddTime DESC").ToList();
      
                foreach (ListQuotationActions d in list)
                {
                    int ID_Catalog = Convert.ToInt32(d.Note.Split('|')[0].ToString());
                    int ID_Location = Convert.ToInt32(d.Note.Split('|')[1].ToString());

                    d.CatalogName = (from c in db.Styles_Shops_Catalogs_Translation
                                          where c.ID_Catalog == ID_Catalog && c.LanguageCode == lang
                                          select c).FirstOrDefault().CatalogName.ToString();      

                    d.LocationName = (from l in db.Styles_Users_Locations_Translation
                                           where l.ID_Location == ID_Location && l.LanguageCode == lang
                                           select l).FirstOrDefault().LocationName.ToString();
                }

          


                var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel()
                        {
                            status = true,
                            data = list,
                            error_message = ""
                        });
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

      
    }

    public class ListQuotationActions
    {

        public int ID_Action { get; set; }
        public string Status { get; set; }
        public int ID_User { get; set; }
        public Nullable<int> ID_Quotation { get; set; }
        public string Note { get; set; }
        public Nullable<System.DateTime> AddTime { get; set; }
        public Nullable<double> Price { get; set; }

        public string CatalogName { get; set; }
        public string LocationName { get; set; }

        public Nullable<bool> Hidden { get; set; }

        public virtual Styles_Users_Quotations Styles_Users_Quotations { get; set; }
    }

    public class ListQuotation
    {
        public string LocationName { get; set; }
        public string Logo { get; set; }
        public double DownloadFee { get; set; }
        public double DownloadFee2 { get; set; }
        public string CatalogName { get; set; }
        public string FullName { get; set; }
        public string CompanyName { get; set; }
        public int ID_Quotation { get; set; }
        public int ID_User { get; set; }
        public int ID_Location { get; set; }
        public int ID_Catalog { get; set; }
        public string Title { get; set; }
        public string FileUrl { get; set; }
        public string FileUrlDemo { get; set; }
        public Nullable<int> TotalDownload { get; set; }
        public Nullable<System.DateTime> AddTime { get; set; }
        public Nullable<System.DateTime> EditTime { get; set; }
        public string UserName { get; set; }
        public Nullable<bool> IsType { get; set; }
        public Nullable<bool> Active { get; set; }
        public Nullable<bool> IsInTrash { get; set; }
        public Nullable<bool> Hidden { get; set; }
    }

}


